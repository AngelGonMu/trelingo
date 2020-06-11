import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent implements OnInit {

  registerForm: FormGroup;

  constructor(private authService: AuthService, private formBuilder: FormBuilder, private router: Router) { }

  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      name: [''],
      surname: [''],
      email: [''],
      password: [''],
      company: [''],
      vat: ['']
    });
  }

  get f() { return this.registerForm.controls; }

  register() {
    this.authService.register(
      {
        name: this.f.name.value,
        surname: this.f.surname.value,
        email: this.f.email.value,
        password: this.f.password.value,
        company_name: this.f.company.value,
        vat: this.f.vat.value
      }
    )
    .subscribe(success => {
      if (success) {
        this.router.navigate(['/login']);
      } else {
      }
    });
  }

}
