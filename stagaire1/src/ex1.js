import { useState
 } from "react";
export function Header(props){
    return(<center><h1>{props.titre}</h1></center>)
 }
export function Voitures(props){
    return  (<div className="col-4">
        <h1 className="alert-secondary p-3 text-center">
            {props.voiture.titre}
        </h1>
        <p className="text-center text-secondary">{props.voiture.catégorie}</p>
        <p className="text-center text-danger">{props.voiture.prix} </p>
        
    </div>);
}
