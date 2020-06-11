import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { config } from '../../../../config';

@Injectable({
  providedIn: 'root'
})
export class DynamicService {

  constructor(private http: HttpClient) {}

  list(table:string, params?:any) :Observable<any> {
    if(params!=null){
      return this.http.get(`${config.apiUrl}${table}?${params}`);
    }
    return this.http.get(`${config.apiUrl}${table}`);
  }

  get(table:string, id:number) :Observable<any> {
    return this.http.get(`${config.apiUrl}${table}/${id}`);
  }

  store(table:string, item?:any) :Observable<any> {
    return this.http.post(`${config.apiUrl}${table}`, item);
  }

  update(table:string, id:number, item:any) :Observable<any> {
    return this.http.put(`${config.apiUrl}${table}/${id}`, item);
  }

  delete(table:string, id:number) :Observable<any> {
    return this.http.delete(`${config.apiUrl}${table}/${id}`);
  }

  pdf(table:string, id:number) :boolean {
    this.http.get(`${config.apiUrl}pdf/${table}/${id}`,{responseType: 'arraybuffer'}).subscribe(response => this.downLoadFile(response, "application/pdf"));
    return true;
  }

  downLoadFile(data: any, type: string) {
    let blob = new Blob([data], { type: type});
    let url = window.URL.createObjectURL(blob);
    let pwa = window.open(url);
    if (!pwa || pwa.closed || typeof pwa.closed == 'undefined') {
        alert( 'Please disable your Pop-up blocker and try again.');
        //application/pdf
    }
  }

}
