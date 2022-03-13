import React, { useState } from "react";
import "./navbar.scss";
import { Link } from "react-router-dom";
import { ReactComponent as ShoppingIcon } from "../../assets/shopping-bag.svg";
import logo from "../../assets/logo.png";
import CartDropdown from "../cart-dropdown/cart-dropdown";

const NavBar = (props) => {

  const [navBarActive, setNavBarActive] = useState(false)
  const [hidden, setHidden] = useState(true);
  const [hiddenCart, setHiddenCart] = useState(true);



  const showMenu = () => {
    setNavBarActive(!navBarActive)
    setHidden(true)
  };


  const handleHidden = () => {
    setHiddenCart(!hiddenCart)
  }
  const signOut = () => {
    localStorage.removeItem("loggedUser");
    props.setLoggedUser("")
  }

  return (
    <header className="header" role={"banner"} id='navbar' >
      <div onClick={showMenu}>
        <i className="fas fa-bars burgerMenu"></i>
      </div>

      <nav className="nav">
        <div className="navCenter">
          <Link to="/"><img src={logo} alt="website logo" width={"100px"} /></Link>
        </div>
        <ul className={`${navBarActive ? "activeBurger" : ""} topList`}>
          <li>
            <Link to="/">
              Home
            </Link>
          </li>
          <li>
            <Link to="/glasses">Shop</Link>
          </li>
          {/* <li>
            <Link to="/rooms">Appointment</Link>
          </li> */}
          {
            props.loggedUser ?
              <div className="sign-out">
                <li>
                  <Link to="/profile">Profile</Link>
                </li>
                <li onClick={signOut}>
                  <Link to="/login">Sign Out</Link
                  ></li>
              </div> :
              <li>
                <Link to="/login">Login</Link>
              </li>
          }
        </ul>
        {props.loggedUser ? <div className="shoppingCart" onClick={handleHidden}>
          <ShoppingIcon className="shopping-icon" />
          <span className="item-count">{props.loggedUser.cartItems.reduce((total, item) => total + item.quantity, 0)}</span>
        </div> : null}

      </nav>
      {hiddenCart ? null : <CartDropdown loggedUser={props.loggedUser} handleHidden={setHiddenCart} setLoggedUser={props.setLoggedUser} />}
    </header>
  );

}

export default NavBar;