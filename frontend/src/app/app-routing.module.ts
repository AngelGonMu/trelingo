import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { TranslateModule } from '@ngx-translate/core';
import { LoginComponent } from './auth/components/login/login.component';
import { RegisterComponent } from './auth/components/register/register.component';
import { AuthGuard } from './auth/guards/auth.guard';

import { UIComponent } from './ui/ui.component';
import { InfoComponent } from './info/info.component';


const routes: Routes = [
  {
    path: '',
    component: InfoComponent
  },
  {
    path: 'login',
    component: LoginComponent,
    canActivate: [AuthGuard]
  },
  {
    path: 'register',
    component: RegisterComponent
  },
  {
    path: 'ui/:component',
    component: UIComponent
  },
  {
    path: 'ui/:parent/:component',
    component: UIComponent
  },
  {
    path: 'ui/:parent/:component/:id',
    component: UIComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes), TranslateModule],
  exports: [RouterModule]
})
export class AppRoutingModule { }
