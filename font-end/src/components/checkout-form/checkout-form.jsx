import React, { useState } from 'react'
import { useNavigate } from 'react-router-dom'
import "./checkout-form.css"
import Swal from 'sweetalert2'
import axios from 'axios'

function CheckoutForm({ setLoggedUser }) {
  const [user, setUser] = useState(JSON.parse(localStorage.getItem("loggedUser")))
  const navigate = useNavigate();
  const [checkoutInfo, setCheckoutInfo] = useState({
    mobile_number: "",
    address: "",
    country: "",
    city: ""
  })

  const [couponAmount, setCouponAmount] = useState("");
  const [totalPrice, setTotalPrice] = useState(user.cartItems.reduce((total, item) => total + item.quantity * item.price, 0))
  const handleCouponChange = (e) => {
    setCouponAmount(e.target.value);
  }

  const handleCouponSubmit = (e) => {
    e.preventDefault();
    if (totalPrice === user.cartItems.reduce((total, item) => total + item.quantity * item.price, 0)) {
      if (couponAmount === "mahdi") {
        setTotalPrice(totalPrice - totalPrice * 0.1)
        alert("Copoun applied");

      } else {
        alert("wrong coupoun");
      }
    } else {
      alert("wrong coupoun");
    }
  }

  const handleChange = (e) => {
    const { name, value } = e.target;
    setCheckoutInfo({ ...checkoutInfo, [name]: value });
  };

  const handleCheckout = async (e) => {
    e.preventDefault();
    user.cartItems.length = 0;
    localStorage.setItem("loggedUser", JSON.stringify(user));
    // const allUsers = JSON.parse(localStorage.getItem("users"));
    // const filteredAllUsers = allUsers.filter((data) => user.id !== data.id);
    // filteredAllUsers.push(user);
    // localStorage.setItem("users", JSON.stringify(filteredAllUsers));
    const tempCart = JSON.parse(localStorage.getItem('tempCart'))
    const confirm = tempCart.map(async (cart) => {
      const checkoutData = {
        ...checkoutInfo,
        ...cart,
        user_id: user.id,
        name: user.name,
        email: user.email,
        total: totalPrice
      }

      console.log(checkoutData)
      const response = await axios.post('http://127.0.0.1:8000/api/checkout', checkoutData)
      // const confirm = response.data
      return response.data
    })
    console.log(confirm)
    if (confirm) {

      user.cartItems = []
      localStorage.setItem("loggedUser", JSON.stringify(user));
      setUser(JSON.parse(localStorage.getItem("loggedUser")));
      setLoggedUser(JSON.parse(localStorage.getItem("loggedUser")));
      Swal.fire({
        icon: "success",
        title: "Thank you",
        text: "Thank you for purchasing from us",
      }).then(() => {
        localStorage.removeItem('tempCart')
        navigate("/")
      }
      );
    } else {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Error happened, please try again.",
      });
    }
  }

  return (
    <>



      <div className='checkout-form-container'>
        <form onSubmit={handleCheckout}>
          <div>
            <label>Full Name</label>
            <input
              type="text"
            // value={user.firstName + " " + user.lastName}
            // readOnly
            />
          </div>
          <div>
            <label>Email</label>
            <input type="text" value={user.email} readOnly />
          </div>
          <div>
            <label>Mobile Number</label>
            <input
              name="mobile_number"
              type="tel"
              value={checkoutInfo.mobile_number}
              onChange={handleChange}
              required
              min="10"
            />
          </div>
          <div>
            <label>Country</label>
            <input
              name="country"
              type="text"
              value={checkoutInfo.country}
              onChange={handleChange}
              required
            />
          </div>
          <div>
            <label>City</label>
            <input
              name="city"
              type="text"
              value={checkoutInfo.city}
              onChange={handleChange}
              required
            />
          </div>
          <div>
            <label>Address</label>
            <input
              name="address"
              type="text"
              value={checkoutInfo.address}
              onChange={handleChange}
              required
            />
          </div>
          <button type='submit' className='checkout-btn'>Confirm Purchase</button>
        </form>
      </div>
      <div className='coupon-form-container'>
        <form onSubmit={handleCouponSubmit}>
          <div>
            <label>Enter Coupon</label>
            <input
              type="text"
              value={couponAmount}
              required
              onChange={handleCouponChange}
            />
          </div>
          <button type='submit' className='coupon-btn '>Add Coupon</button>
        </form>
        <p className='coupon-total-price'>Total Price: ${totalPrice}</p>
      </div>
    </>
  )
}

export default CheckoutForm
