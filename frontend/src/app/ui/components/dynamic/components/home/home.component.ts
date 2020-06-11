import { Component, OnInit, OnDestroy } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { DynamicService } from '../../services/dynamic.service';
import { TranslateService } from "@ngx-translate/core";
import { Chart } from "chart.js";
import dayGridPlugin from '@fullcalendar/daygrid';
import esLocale from '@fullcalendar/core/locales/es';
import enLocale from '@fullcalendar/core/locales/fr';

import { config } from '../../../../../config';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit, OnDestroy {

  //Component
  component="home";
  result: any;
  list:string;
  module: any;
  modules: any;
  detail:boolean;
  private sub: any;

  //Charts
  customers:any;
  quotes:any;
  invoices:any;
  topproducts:any;
  topdeals:any;
  topsales:any;

  //Calendar
  calendarPlugins = [dayGridPlugin];
  events:any;
  locales:any;
  locale:string;

  constructor(private _ds:DynamicService, private route: ActivatedRoute, private _ts: TranslateService) { }

  ngOnInit() {
    this.result=[];
    this.modules=config.modules;
    this.module=config.modules[this.component];
    this.detail=false;
    this.sub = this.route.params.subscribe(params => {
      let c = params['component'];
      if(c==this.component) {
        this.locales=[enLocale,esLocale];
        this.locale=this._ts.getDefaultLang();
        this.dashboard();
        this.detail=true;
      }
    });
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
      // Add a click event on each of them
      $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {

          // Get the target from the "data-target" attribute
          const target = el.dataset.target;
          const $target = document.getElementById(target);

          switch(target){
            case 'navbarNavigation':
              document.getElementById('navbtnFunctions').classList.remove('is-active');
              document.getElementById('navbarFunctions').classList.remove('is-active');
              break;
            case 'navbarFunctions':
              document.getElementById('navbtnNavigation').classList.remove('is-active');
              document.getElementById('navbarNavigation').classList.remove('is-active');
              break;
          }

          // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
          el.classList.toggle('is-active');
          $target.classList.toggle('is-active');
        });
      });

    }
  }

  ngOnDestroy(){
    this.sub.unsubscribe();
  }

  dashboard() {
    this._ds.list("dashboard").subscribe(list => {
      this.result=list.dashboard;
      this.loadCustomerChart();
      this.loadQuotesChart();
      this.loadInvoicesChart();
      this.loadTopProductsChart();
      this.loadTopDealsChart();
      this.loadTopSalesChart();
      this.events=this.loadTodoEvents();
    });
  }

  loadCustomerChart(){
    let ctx = (<HTMLCanvasElement>document.getElementById("customersCanvas")).getContext('2d');
    this.customers = new Chart(ctx, {
      type: 'doughnut',
      data: {
        datasets: [{
          data: [
            this.result.activecustomers,
            this.result.customers-this.result.activecustomers,
          ],
          backgroundColor: [
            "#ffdd57",
            "#dadada",
          ],
          label: 'Dataset'
        }],
        labels: [
          'Active',
          'Other'
        ]
      },
      options: {
        responsive: true,
        legend: {
          position: 'top',
        },
        animation: {
          animateScale: true,
          animateRotate: true
        },
        // circumference: Math.PI,
        // rotation: -Math.PI
      }
    });
  }

  loadQuotesChart(){
    let ctx = (<HTMLCanvasElement>document.getElementById("quotesCanvas")).getContext('2d');
    this.quotes = new Chart(ctx, {
      type: 'pie',
      data: {
        datasets: [{
          data: [
            this.result.openquotes,
            this.result.quotes-this.result.openquotes,
          ],
          backgroundColor: [
            "#47c874",
            "#dadada",
          ],
          label: 'Dataset'
        }],
        labels: [
          'Open',
          'Other'
        ]
      },
      options: {
        responsive: true,
        legend: {
          position: 'top',
        },
        animation: {
          animateScale: true,
          animateRotate: true
        },
      }
    });
  }

  loadInvoicesChart(){
    let ctx = (<HTMLCanvasElement>document.getElementById("invoicesCanvas")).getContext('2d');
    this.invoices = new Chart(ctx, {
      type: 'doughnut',
      data: {
        datasets: [{
          data: [
            this.result.openinvoices,
            this.result.closedinvoices,
            this.result.invoices-(this.result.openinvoices+this.result.closedinvoices),
          ],
          backgroundColor: [
            "#3297dc",
            "#01799c",
            "#dadada",
          ],
          label: 'Dataset'
        }],
        labels: [
          'Open',
          'Closed',
          'Other'
        ]
      },
      options: {
        responsive: true,
        legend: {
          position: 'top',
        },
        animation: {
          animateScale: true,
          animateRotate: true
        },
        circumference: Math.PI,
        rotation: -Math.PI
      }
    });
  }

  loadTopProductsChart(){
    let ctx = (<HTMLCanvasElement>document.getElementById("topproductsCanvas")).getContext('2d');
    this.topproducts = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
        datasets: [{
          data: this.result.topproducts.units,
          backgroundColor: "#f14668",
          label: 'Dataset'
        }],
        labels: this.result.topproducts.products
      },
      options: {
        responsive: true,
        legend: {
          position: 'top',
          display: false,
        },
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        animation: {
          animateScale: true,
          animateRotate: true
        }
      }
    });
  }

  loadTopDealsChart(){
    let ctx = (<HTMLCanvasElement>document.getElementById("topdealsCanvas")).getContext('2d');
    this.topdeals = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
        datasets: [{
          data: this.result.topdeals.sums,
          backgroundColor: "#48c774",
          label: 'Dataset'
        }],
        labels: this.result.topdeals.codes
      },
      options: {
        responsive: true,
        legend: {
          position: 'top',
          display: false,
        },
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        animation: {
          animateScale: true,
          animateRotate: true
        }
      }
    });
  }

  loadTopSalesChart(){
    let ctx = (<HTMLCanvasElement>document.getElementById("topsalesCanvas")).getContext('2d');
    this.topsales = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
        datasets: [{
          data: this.result.topsales.sums,
          backgroundColor: "#3297dc",
          label: 'Dataset'
        }],
        labels: this.result.topsales.codes
      },
      options: {
        responsive: true,
        legend: {
          position: 'top',
          display: false,
        },
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        animation: {
          animateScale: true,
          animateRotate: true
        }
      }
    });
  }

  loadTodoEvents(){
    let ev:any=[];
    for (let i = 0; i < this.result.events.length; i++) {
      const event = {
        editable: false,
        start: this.result.events[i].date,
        end: this.result.events[i].due_date,
        title: this.result.events[i].type +" - "+this.result.events[i].description
      };
      ev.push(event);
    }
    return ev;
  }

}
