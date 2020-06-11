import { Component, OnInit, OnDestroy } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

import { CustomersComponent } from './components/customers/customers.component';
import { ContactsComponent } from './components/contacts/contacts.component';
import { ProductsComponent } from './components//products/products.component';
import { ServicesComponent } from './components/services/services.component';
import { QuotesComponent } from './components/quotes/quotes.component';
import { OrdersComponent } from './components/orders/orders.component';
import { InvoicesComponent } from './components/invoices/invoices.component';
import { HomeComponent } from './components/home/home.component';
import { PreferencesComponent } from './components/preferences/preferences.component';

@Component({
  selector: 'app-dynamic',
  templateUrl: './dynamic.component.html',
  styleUrls: ['./dynamic.component.scss']
})
export class DynamicComponent implements OnInit {


  dynamicComponent = null;
  id: number;
  component: string;
  private sub: any;

  constructor(private route: ActivatedRoute, private router: Router) {}

  ngOnInit() {
    this.sub = this.route.params.subscribe(params => {
        this.component = params['component'];

        switch(this.component){
          case 'home':
            this.dynamicComponent = HomeComponent;
            break;
          case 'entities':
            this.router.navigate(['ui/entities/customers']);
            break;
          case 'customers':
            this.dynamicComponent = CustomersComponent;
            break;
          case 'contacts':
            this.dynamicComponent = ContactsComponent;
            break;
          case 'production':
            this.router.navigate(['ui/production/products']);
            break;
          case 'products':
            this.dynamicComponent = ProductsComponent;
            break;
          case 'services':
            this.dynamicComponent = ServicesComponent;
            break;
          case 'sales':
            this.router.navigate(['ui/sales/quotes']);
            break;
          case 'quotes':
            this.dynamicComponent = QuotesComponent;
            break;
          case 'orders':
            this.dynamicComponent = OrdersComponent;
            break;
          case 'invoices':
            this.dynamicComponent = InvoicesComponent;
            break;
          case 'preferences':
            this.dynamicComponent = PreferencesComponent;
            break;
        }
    });
  }

  ngOnDestroy() {
    this.sub.unsubscribe();
  }

}
