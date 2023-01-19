import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable} from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ProduitServiceService {

  url:string = 'http://localhost:8000/api/' 
  headers:any = new HttpHeaders({'Content-Type':'text; charset=utf-8'});

  constructor(
    private http:HttpClient,
  ) { }

  getProducts(){
    return this.http.get(this.url + "produits/all" );
  }

  getCategories(){
    return this.http.get(this.url + "categories/all" );
  }

  addProduct(formData:any){
    return this.http.post(this.url + "produits/add", formData, this.headers);
  }
}
