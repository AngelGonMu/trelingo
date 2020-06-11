import { Pipe, PipeTransform } from '@angular/core';
import { DomSanitizer, SafeHtml } from '@angular/platform-browser';
import { MultiDimensionalValuePipe } from './multi-dimensional-value.pipe';
import { DynamicService } from '../components/dynamic/services/dynamic.service';

@Pipe({
  name: 'fieldType'
})
export class FieldTypePipe extends MultiDimensionalValuePipe implements PipeTransform {

  constructor(private domSanitizer: DomSanitizer, private _ds: DynamicService) {
    super();
  }

  transform(value: any, ...args: any[]): SafeHtml {
    let field:string;
    let val=super.transform(args[0],args[1]);

    switch(value){
      case 'text':
        field = `<input id="${args[2]}_${args[0]}_${args[1].id}" class="input is-small has-text-black" type="text" value="${val}">`;
        break;
      case 'number':
        field = `<input id="${args[2]}_${args[0]}_${args[1].id}" class="input is-small has-text-black" type="number" value="${val}">`;
        break;
      case 'date':
        field = `<input id="${args[2]}_${args[0]}_${args[1].id}" class="input is-small has-text-black" type="date" value="${val}">`;
        break;
      case 'email':
        field = `<input id="${args[2]}_${args[0]}_${args[1].id}" class="input is-small has-text-black" type="email" value="${val}">`;
        break;
      case 'textarea':
        field = `<textarea id="${args[2]}_${args[0]}_${args[1].id}" class="textarea is-small has-text-black">${val}</textarea>`;
        break;
    }
    return this.domSanitizer.bypassSecurityTrustHtml(field);
  }

}
