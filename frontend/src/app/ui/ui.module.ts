import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { RouterModule } from '@angular/router';
import { TokenInterceptor } from '../token.interceptor';
import { TranslateModule } from "@ngx-translate/core";
import { FormsModule } from '@angular/forms';
import { FullCalendarModule } from '@fullcalendar/angular';

import { UIComponent } from './ui.component';
import { NavbarComponent } from "./components/navbar/navbar.component";
import { LeftbarComponent } from "./components/leftbar/leftbar.component";
import { DynamicComponent } from "./components/dynamic/dynamic.component";
import { CustomersComponent } from './components/dynamic/components/customers/customers.component';
import { ContactsComponent } from './components/dynamic/components/contacts/contacts.component';
import { ProductsComponent } from './components/dynamic/components/products/products.component';
import { ServicesComponent } from './components/dynamic/components/services/services.component';
import { QuotesComponent } from './components/dynamic/components/quotes/quotes.component';
import { OrdersComponent } from './components/dynamic/components/orders/orders.component';
import { InvoicesComponent } from './components/dynamic/components/invoices/invoices.component';
import { HomeComponent } from './components/dynamic/components/home/home.component';
import { PreferencesComponent } from './components/dynamic/components/preferences/preferences.component';
import { MultiDimensionalValuePipe } from './pipes/multi-dimensional-value.pipe';
import { FieldTypePipe } from './pipes/field-type.pipe';

@NgModule({
  declarations: [
    UIComponent, NavbarComponent, LeftbarComponent, DynamicComponent, CustomersComponent, ContactsComponent, ProductsComponent, ServicesComponent, QuotesComponent, OrdersComponent, InvoicesComponent, HomeComponent, PreferencesComponent, MultiDimensionalValuePipe, FieldTypePipe],
  providers: [
    {
      provide: HTTP_INTERCEPTORS,
      useClass: TokenInterceptor,
      multi: true
    }
  ],
  imports: [
    CommonModule,
    RouterModule,
    HttpClientModule,
    ReactiveFormsModule,
    TranslateModule,
    FormsModule,
    FullCalendarModule
  ],
  entryComponents: [
    CustomersComponent, ContactsComponent, ProductsComponent, ServicesComponent, QuotesComponent, OrdersComponent, InvoicesComponent, HomeComponent, PreferencesComponent
  ]
})
export class UIModule { }
