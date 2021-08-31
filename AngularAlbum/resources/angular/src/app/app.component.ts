import { Component } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { Post } from './post';
import { PostDialogComponent } from './post-dialog/post-dialog.component';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.sass']
})
export class AppComponent {
  title = 'angular';
  public posts: Post[] = [
    new Post("Image", "Description"),
    new Post("Image2", "Description2"),
    new Post("Image3", "Description3"),
  ];

  constructor(
    public dialog: MatDialog
  ) { }

  openDialog() {
    const dialogRef = this.dialog.open(PostDialogComponent, {
      width: '600px'
    });
    dialogRef.afterClosed().subscribe(result => {
      if (result) {
        console.log(result);
      }
    });
  }
}