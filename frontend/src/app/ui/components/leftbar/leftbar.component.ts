import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/auth/services/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-leftbar',
  templateUrl: './leftbar.component.html',
  styleUrls: ['./leftbar.component.scss']
})
export class LeftbarComponent implements OnInit {

  user:any;

  constructor(private _auth: AuthService, private router:Router) { }

  ngOnInit() {
    this.user = this._auth.getUser();
  }

  logout() {
    this._auth.logout()
    .subscribe(success => {
      if (success) {
        this.router.navigate(['/login']);
      }
    });
  }

}
