import { Pipe, PipeTransform } from '@angular/core';
import { get } from "lodash";

@Pipe({
  name: 'mdvalue'
})
export class MultiDimensionalValuePipe implements PipeTransform {

  transform(value: any, ...args: any[]): any {
    let val = get(args[0], value, '');
    if(val==null){
      val='';
    }
    return val;
  }

}
