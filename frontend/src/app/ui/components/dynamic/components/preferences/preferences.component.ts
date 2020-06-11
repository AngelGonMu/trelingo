import { Component, OnInit, OnDestroy } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { DynamicService } from '../../services/dynamic.service';

import { config } from '../../../../../config';

@Component({
  selector: 'app-preferences',
  templateUrl: './preferences.component.html',
  styleUrls: ['./preferences.component.scss']
})
export class PreferencesComponent implements OnInit, OnDestroy {

  component="preferences";
  result: any;
  list:string;
  module: any;
  modules: any;
  detail:boolean;
  private sub: any;

  constructor(private _ds:DynamicService, private route: ActivatedRoute, private router: Router) { }

  ngOnInit() {
    this.result=[];
    this.modules=config.modules;
    this.module=config.modules[this.component];
    this.detail=false;
    this.sub = this.route.params.subscribe(params => {
      let c = params['component'];
      if(c==this.component) {
        this.get();
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

  changeTab(index){
    let tablinks = document.getElementsByClassName("tab-link");
    let tabcontents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tablinks.length; i++) {
      tablinks[i].classList.remove('is-active');
      tabcontents[i].classList.remove('is-active');
    }
    tablinks[index].classList.add('is-active');
    tabcontents[index].classList.add('is-active');
  }

  get() {
    this._ds.get(this.component, 1).subscribe(item => {this.result=item;this.detail=true});
  }

  deleteRelated(component:string,id:number){
    this._ds.delete(component, id).subscribe(data => {this.router.navigate([`/ui/${this.component}`]);this.get();});
  }

  newRelated(component:string){
    let form:any;
    form={list: this.list};
    this._ds.store(component, form).subscribe(data => {this.router.navigate([`/ui/${this.component}`]);this.get();});
  }

  updateRelated(component:string,id:number){
    let form:any="{";
    for (let i = 0; i < this.modules[component].listfields.length; i++) {
      const element:string = `"${this.modules[component].listfields[i]}": "${(<HTMLInputElement>document.getElementById(component+"_"+this.modules[component].listfields[i]+"_"+id)).value}"`;
      if(i==this.modules[component].listfields.length-1) {
        form+=element;
      } else {
        form+=element+",";
      }
    }
    form+="}";
    this._ds.update(component, id, JSON.parse(form)).subscribe(data => {this.router.navigate([`/ui/${this.component}`]);this.get();});
  }

  save() {
    let form={
      company_name: (<HTMLInputElement>document.getElementById(this.component+"_company_name_1")).value,
      vat: (<HTMLInputElement>document.getElementById(this.component+"_vat_1")).value,
      address_info: {
        address: (<HTMLInputElement>document.getElementById(this.component+"_address_info.address_1")).value,
        city: (<HTMLInputElement>document.getElementById(this.component+"_address_info.city_1")).value,
        postal_code: (<HTMLInputElement>document.getElementById(this.component+"_address_info.postal_code_1")).value,
        province: (<HTMLInputElement>document.getElementById(this.component+"_address_info.province_1")).value,
        country: (<HTMLInputElement>document.getElementById(this.component+"_address_info.country_1")).value
      },
      contact_info: {
        phone1: (<HTMLInputElement>document.getElementById(this.component+"_contact_info.phone1_1")).value,
        phone2: (<HTMLInputElement>document.getElementById(this.component+"_contact_info.phone2_1")).value,
        email: (<HTMLInputElement>document.getElementById(this.component+"_contact_info.email_1")).value,
        web: (<HTMLInputElement>document.getElementById(this.component+"_contact_info.web_1")).value
      }
    };
    this._ds.update(this.component, 1, form).subscribe(item => this.result=item);
  }

}
