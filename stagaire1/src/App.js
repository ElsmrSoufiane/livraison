import logo from './logo.svg';
import './App.css';
import { vs } from './data';
import { Voitures } from './ex1';
import { Header } from './ex1';
import { useState } from 'react';
function App() {
const [cat,setCat]=useState("");
  return (
   <>
   <Header titre="Liste des voitures" />
   <div style={{display:"flex",justifyContent:"space-evenly"}}>
   <button className='btn btn-secondary' onClick={()=>setCat("MINI-CITADINES")}>MINI-CITADINES</button>
    <button className='btn btn-secondary' onClick={()=>setCat("SUV")}>SUV</button>
    <button className='btn btn-secondary' onClick={()=>setCat("COMPACT")}>COMPACT</button>
 
  
    
   </div>
   <br/>
   <div className='row'>

    {cat!=""?vs.filter(e=>{
      return e.catégorie==cat
    }).map((e,i)=>{
      return (<Voitures voiture={e} />)
    }):vs.map((e,i)=>{
      return (<Voitures voiture={e} />)
    })}
   </div>
   </>
  );
}

export default App;
