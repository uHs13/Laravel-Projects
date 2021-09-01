import { Component, Input, OnInit } from '@angular/core';
import { Post } from '../post';
import { PostService } from '../post.service';

@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.sass']
})
export class PostComponent implements OnInit {

  @Input() post: any;

  constructor(
    private postService: PostService
  ) { }

  ngOnInit(): void {
  }

  like() {
    this.postService.like(this.post.id);
  }

}