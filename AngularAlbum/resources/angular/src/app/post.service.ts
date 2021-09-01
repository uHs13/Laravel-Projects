import { HttpClient, HttpEvent, HttpEventType } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Post } from './post';

@Injectable()
export class PostService {

  public posts: Post[] = [];

  constructor(private http: HttpClient) {

    this.getAll();

  }

  getAll() {
    this.http.get('/api').subscribe((posts: any) => {
      for (let p of posts) {
        this.posts.push(new Post(
          p.name,
          p.description,
          p.path,
          p.id,
          p.likes
        ));
      }
    });
  }

  save(post: Post, file: File) {

    let data = new FormData();
    data.append('name', post.name);
    data.append('description', post.description);
    data.append('file', file, file.name);

    this.http.post('/api', data, {
      reportProgress: true,
      observe: 'events'
    })
    .subscribe((event: any) => {
      if (event.type == HttpEventType.Response) {
        let p: any = event.body;

        this.posts.push(new Post(
          p.name,
          p.description,
          p.path,
          p.id,
          p.likes
        ));

      }
      if (event.type == HttpEventType.UploadProgress) {
        console.log('upload progress');
        console.log(event);
      }
    });

  }

  like(id: any) {

    this.http.get('/api/like/' + id)
    .subscribe((event: any) => {
      let post: any = this.posts.find((p) => p.id == id);
      post.likes = event.likes;
    });

  }

}