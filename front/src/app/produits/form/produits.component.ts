import { ImplicitReceiver } from '@angular/compiler';
import { Component, OnInit } from '@angular/core';
import { ProduitServiceService } from './produit-service.service';
// import { TableComponent } from '../table/table.component';

@Component({
  selector: 'app-produits',
  templateUrl: './produits.component.html',
  styleUrls: ['./produits.component.scss']
})
export class ProduitsComponent implements OnInit{

  listCategories:any = [];
  listProduct:any = [];
  product = {
    'name' :null,
    'slug' :null,
    'categorie_id' :0,
    'stock' :0,
  };

  constructor(
    private produitService:ProduitServiceService,
    // private prod:TableComponent
  ){}

  ngOnInit(): void {
      this.getAllCategories();
      this.getAllProducts();
  }

  getAllProducts(){
    this.produitService.getProducts().subscribe(data =>{
     this.listProduct = data;
    });
   console.log(this.listProduct)
 }

  getAllCategories(){
    this.produitService.getCategories().subscribe(data => {
      this.listCategories = data;
    });
  }

  addProduct(){
    this.produitService.addProduct(this.product).subscribe(() =>{
      console.log('done');
      this.getAllProducts();
    })
  }

  selectCatego(value:any){
    console.log(value);
    this.product.categorie_id = value;
    
  }
}
