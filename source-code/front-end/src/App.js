import './App.scss';
import { useState } from 'react';
import { Route, Routes } from "react-router-dom";
import glasses from './data/glasses/glasses';
import rooms from './data/rooms/rooms';

import NavBar from './components/navbar/navbar';
import HomePage from './pages/homepage/homepage';
import Footer from './components/footer/footer';
import Login from './components/login/login'
import Register from './components/register/register'
import GlassesShop from './components/glasses-in-shop/glasses-in-shop'
import RoomsShop from './components/rooms-in-shop/rooms-in-shop'
import DetailedGlasses from './components/detailed-glass/detailed-glass';
import DetailedRoom from './components/detailed-room/detailed-room';
import Cart from './components/cart/cart'
import CheckoutPage from './components/checkout-page/checkout-page';
import Userprofile from './components/user-profile/user-profile';


function App() {
  const [loggedUser, setLoggedUser] = useState(JSON.parse(localStorage.getItem("loggedUser")));
  return (
    <div className="App">
      <NavBar loggedUser={loggedUser} setLoggedUser={setLoggedUser} />
      <Routes>
        <Route exact path="/" element={<HomePage />} />
        <Route exact path="/login" element={<Login setLoggedUser={setLoggedUser} />} />
        <Route exact path="/register" element={<Register setLoggedUser={setLoggedUser} />} />
        <Route exact path="/glasses" element={<GlassesShop />} />
        <Route exact path="/rooms" element={<RoomsShop />} />
        {/* <Route exact path="/glasses/:id" element={<DetailedGlasses glasses={glasses} loggedUser={loggedUser} setLoggedUser={setLoggedUser} />} /> */}
        <Route exact path="/glasses/:id" element={<DetailedGlasses glasses={glasses} loggedUser={loggedUser} setLoggedUser={setLoggedUser} />} />
        <Route exact path="/glasses/:title" element={<DetailedGlasses setLoggedUser={setLoggedUser} />} />
        <Route exact path="/rooms/:title" element={<DetailedRoom rooms={rooms} />} />
        <Route exact path="/cart" element={<Cart setLoggedUser={setLoggedUser} />} />
        <Route exact path="/checkout" element={<CheckoutPage setLoggedUser={setLoggedUser} />} />
        <Route exact path="/profile" element={<Userprofile setLoggedUser={setLoggedUser} loggedUser={loggedUser} />} />
      </Routes>
      <Footer />
    </div>
  );
}

export default App;
