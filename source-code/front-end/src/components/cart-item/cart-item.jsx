import React, { useState } from 'react'
import "./cart-item.css"

function CartItem({ cartItem, removeItem, addToCart, decreaseQuantity, elemntId }) {
    const { name, image_url, price, quantity } = cartItem;
    const tempCartCheck = JSON.parse(localStorage.getItem('tempCart'))
    if (!tempCartCheck) {
        const tempCart = [];
        tempCart.push({
            product_id: elemntId,
            quantity: quantity
        })
        localStorage.setItem('tempCart', JSON.stringify(tempCart))
    } else {
        // tempCartCheck.push({
        //     product_id: elemntId,
        //     quantity: quantity
        // })
        let newCart = [...tempCartCheck]
        console.log('newcart', newCart)
        let found, changed = false

        tempCartCheck.forEach(cart => {
            if (cart.product_id == elemntId) {
                found = true
                if (cart.quantity != quantity) {
                    changed = true
                    cart.quantity = quantity
                }
            }
        })

        if (!found) {
            newCart = [...tempCartCheck]
            newCart.push({
                product_id: elemntId,
                quantity: quantity
            })
        }

        if (found && changed) {
            newCart = [...tempCartCheck]
        }

        localStorage.setItem('tempCart', JSON.stringify(newCart))
    }
    return (
        <div className="checkout-item">
            <div className="image-container">
                <img src={image_url} alt="item" />
            </div>
            <span className="checkout-name">{name}</span>
            <span className="quantity">
                <div className="arrow" onClick={() => decreaseQuantity(cartItem)}>&#10094;</div>
                <span className="value">{quantity}</span>
                <div className="arrow" onClick={() => addToCart(cartItem)}>&#10095;</div>
            </span>
            <span className="price">${price * quantity}</span>
            <div className="remove-button" onClick={() => removeItem(cartItem)} >&#10005;</div>
        </div>
    )
}

export default CartItem
