import { Component, OnInit, OnDestroy } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { DynamicService } from '../../services/dynamic.service';

import { config } from '../../../../../config';

@Component({
  selector: 'app-quotes',
  templateUrl: './quotes.component.html',
  styleUrls: ['./quotes.component.scss']
})
export class QuotesComponent implements OnInit, OnDestroy {

  detail: boolean;
  id: number;
  component="quotes";
  result: any;
  module: any;
  modules: any;
  lists: any;
  private sub: any;


  constructor(private _ds:DynamicService, private route: ActivatedRoute, private router: Router) { }

  ngOnInit() {
    this.result=[];
    this.modules=config.modules;
    this.module=config.modules[this.component];
    this.sortfield="";
    this.sub = this.route.params.subscribe(params => {
      let c = params['component'];
      this.id = +params['id'];
      if(c==this.component) {
        if(this.id>0){
          this.prepareLists();
          this.get();
        } else {
          this.list();
        }
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

  sortfield: string;
  order: string;
  search(){
    this.sub.unsubscribe();
    let s=(<HTMLInputElement>document.getElementById("search")).value;
    let o:string;
    if(this.sortfield.length!=0){
      o="&sort="+this.sortfield+":"+this.order;
    }else{
      o=""
    }
    this._ds.list(this.component, "search="+s+""+o).subscribe(searchedlist => {this.result=[];this.result=searchedlist;this.detail=false;});
  }

  sort(field:string){
    this.sub.unsubscribe();
    if(field==this.sortfield){
      if(this.order=="desc"){
        this.order="asc";
      }else{
        this.order="desc";
      }
    }else{
      this.order="asc";
      this.sortfield=field;
    }
    let s=(<HTMLInputElement>document.getElementById("search")).value;
    if(s.length!=0){
      s="&search="+s;
    }else{
      s="";
    }
    this._ds.list(this.component, "sort="+this.sortfield+":"+this.order+""+s).subscribe(sortedlist => {this.result=[];this.result=sortedlist;this.detail=false;});
  }

  list() {
    this._ds.list(this.component).subscribe(list => {this.result=list;this.detail=false;});
  }

  get() {
    this._ds.get(this.component, this.id).subscribe(item => {this.result=item;this.detail=true;});
  }

  new(){
    this._ds.store(this.component).subscribe(item => this.router.navigate([`/ui/${this.module.parent}/${this.component}/${item.result.id}`]));
  }

  delete(id:number){
    this._ds.delete(this.component, id).subscribe(data => {this.router.navigate([`/ui/${this.module.parent}/${this.component}`]);this.list();});
  }

  deleteRelated(component:string,id:number){
    this._ds.delete(component, id).subscribe(data => {this.router.navigate([`/ui/${this.module.parent}/${this.component}/${this.id}`]);this.get();});
  }

  newRelated(component:string){
    let form:any;
    if(component=="lines"){
      form={lineable_id: this.id, lineable_type: 'App\\Dynamic\\Quote'};
    } else {
      form={quote_id: this.id};
    }
    this._ds.store(component, form).subscribe(data => {this.router.navigate([`/ui/${this.module.parent}/${this.component}/${this.id}`]);this.get();});
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
    this._ds.update(component, id, JSON.parse(form)).subscribe(data => {this.router.navigate([`/ui/${this.module.parent}/${this.component}/${this.id}`]);this.get();});
  }

  save() {
    let form={
      code: (<HTMLInputElement>document.getElementById(this.component+"_code_"+this.id)).value,
      name: (<HTMLInputElement>document.getElementById(this.component+"_name_"+this.id)).value,
      date: (<HTMLInputElement>document.getElementById(this.component+"_date_"+this.id)).value,
      due_date: (<HTMLInputElement>document.getElementById(this.component+"_due_date_"+this.id)).value,
      status: (<HTMLInputElement>document.getElementById(this.component+"_status_"+this.id)).value,
      currency: (<HTMLInputElement>document.getElementById(this.component+"_currency_"+this.id)).value,
      tdtype: (<HTMLInputElement>document.getElementById(this.component+"_tdtype_"+this.id)).value,
      tax: (<HTMLInputElement>document.getElementById(this.component+"_tax_"+this.id)).value,
      discount: (<HTMLInputElement>document.getElementById(this.component+"_discount_"+this.id)).value,
      address_info: {
        address: (<HTMLInputElement>document.getElementById(this.component+"_address_info.address_"+this.id)).value,
        city: (<HTMLInputElement>document.getElementById(this.component+"_address_info.city_"+this.id)).value,
        postal_code: (<HTMLInputElement>document.getElementById(this.component+"_address_info.postal_code_"+this.id)).value,
        province: (<HTMLInputElement>document.getElementById(this.component+"_address_info.province_"+this.id)).value,
        country: (<HTMLInputElement>document.getElementById(this.component+"_address_info.country_"+this.id)).value
      },
      contact_info: {
        phone1: (<HTMLInputElement>document.getElementById(this.component+"_contact_info.phone1_"+this.id)).value,
        phone2: (<HTMLInputElement>document.getElementById(this.component+"_contact_info.phone2_"+this.id)).value,
        email: (<HTMLInputElement>document.getElementById(this.component+"_contact_info.email_"+this.id)).value,
        web: (<HTMLInputElement>document.getElementById(this.component+"_contact_info.web_"+this.id)).value
      }
    };
    this._ds.update(this.component, this.id, form).subscribe(item => this.result=item);
  }

  savepdf() {
    this._ds.pdf(this.component, this.id);
  }

  isSelectElement(val:string):boolean{
    if(val.indexOf(":")!=-1){
      return true;
    }
    return false;
  }

  getListName(val:string):string{
    const p=val.indexOf(":");
    return val.substr(p+1,val.length);
  }

  prepareLists(){
    this.lists="{";
    this._ds.list("vl", "list=currencies").subscribe(list => {
      this.lists+=`"currencies": ${JSON.stringify(list)},`;
    });
    this._ds.list("vl", "list=taxdiscounttype").subscribe(list => {
      this.lists+=`"taxdiscounttype": ${JSON.stringify(list)},`;
    });
    this._ds.list("vl", "list=documentstatus").subscribe(list => {
      this.lists+=`"documentstatus": ${JSON.stringify(list)},`;
    });
    this._ds.list("products").subscribe(list => {
      this.lists+=`"products": ${JSON.stringify(list)},`;
    });
    this._ds.list("customers").subscribe(list => {
      this.lists+=`"customers": ${JSON.stringify(list)},`;
    });
    this._ds.list("contacts").subscribe(list => {
      this.lists+=`"contacts": ${JSON.stringify(list)}}`;
      this.lists=JSON.parse(this.lists);console.log(this.lists);
    });
  }

}
