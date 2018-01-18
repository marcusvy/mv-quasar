import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-user-role-item',
  templateUrl: './user-role-item.component.html',
  styleUrls: ['./user-role-item.component.scss']
})
export class UserRoleItemComponent implements OnInit {

  @Input() model;

  constructor() { }

  ngOnInit() {}

}
