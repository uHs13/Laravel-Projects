import { Component, OnInit } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';
import { Post } from '../post';

@Component({
  selector: 'app-post-dialog',
  templateUrl: './post-dialog.component.html',
  styleUrls: ['./post-dialog.component.sass']
})
export class PostDialogComponent implements OnInit {

  public fileName: string = "";

  public data = {
    post: new Post("", ""),
    file: null
  };

  constructor(
    public dialogRef: MatDialogRef<PostDialogComponent>
  ) { }

  ngOnInit(): void {
  }

  changeFile(event: any) {
    this.fileName = event.target.files[0].name;
    this.data.file = event.target.files[0];
  }

  save() {
    this.dialogRef.close(this.data);
  }

  cancel() {
    this.dialogRef.close(null);
  }

}
