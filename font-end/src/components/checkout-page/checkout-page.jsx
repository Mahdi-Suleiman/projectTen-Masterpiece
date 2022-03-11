import React from 'react'
import CheckoutForm from '../checkout-form/checkout-form'
import Coupon from '../coupon/coupon'
import "./checkout-page.css"

function CheckoutPage({ setLoggedUser }) {
    return (
        <div className='checkout-page-container'>
            <CheckoutForm setLoggedUser={setLoggedUser} />
            {/* <Coupon /> */}
        </div>
    )
}

export default CheckoutPage
