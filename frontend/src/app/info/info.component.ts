import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth/services/auth.service';
import { config } from '../config';

@Component({
  selector: 'app-info',
  templateUrl: './info.component.html',
  styleUrls: ['./info.component.scss']
})
export class InfoComponent implements OnInit {

  islogged:boolean;
  docsUrl:string;

  constructor(private _auth: AuthService) { }

  ngOnInit() {
    this.islogged = this._auth.isLoggedIn();
    this.docsUrl=config.docsUrl;

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    const $modalbuttons = Array.prototype.slice.call(document.querySelectorAll('.modal-button'), 0);
    const $modalcloses = Array.prototype.slice.call(document.querySelectorAll('.modal-close'), 0);

    // $(".modal-button").click(function() {
    //     var target = $(this).data("target");
    //     $("html").addClass("is-clipped");
    //     $(target).addClass("is-active");
    // });

    // $(".modal-close").click(function() {
    //     $("html").removeClass("is-clipped");
    //     $(this).parent().removeClass("is-active");
    // });

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

      // Add a click event on each of them
      $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {

          // Get the target from the "data-target" attribute
          const target = el.dataset.target;
          const $target = document.getElementById(target);

          // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
          el.classList.toggle('is-active');
          $target.classList.toggle('is-active');

        });
      });
    }

    if ($modalbuttons.length > 0) {

      // Add a click event on each of them
      $modalbuttons.forEach( el => {
        el.addEventListener('click', () => {

          // Get the target from the "data-target" attribute
          const target = el.dataset.target;
          const $target = document.getElementById(target);

          // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
          $target.classList.add('is-active');

        });
      });
      // Add a click event on each of them
      $modalcloses.forEach( el => {
        el.addEventListener('click', () => {

          // Get the target from the "data-target" attribute
          const target = el.dataset.target;
          const $target = document.getElementById(target);

          // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
          $target.classList.remove('is-active');

        });
      });
    }
  }

}
