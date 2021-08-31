import { Component, Input, OnInit } from '@angular/core';
import { Post } from '../post';

@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.sass']
})
export class PostComponent implements OnInit {

  @Input() post: Post = new Post("","");

  constructor() { }

  ngOnInit(): void {
  }

}
