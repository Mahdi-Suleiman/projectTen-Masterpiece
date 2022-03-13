import React from 'react'
import rooms from '../../data/rooms/rooms'
import { Link } from "react-router-dom"
import './rooms-in-shop.scss';
function RoomsShop() {
  return (
    <div>
      <div>
        <h1 className='generic-title'>Our Rooms</h1>
        <hr />
      </div>
      <div className='glasses-container-home shop'>
        {rooms.map(room => (
          <div className="glass-wrapper shop" key={room.id}>
            <div className="glass-image-wrapper">
              <img className="glass-image" src={room.image} alt={room.title} />
            </div>
            <div className='room-info-home'>
              <h2 className="glass-title">{room.title}</h2>
              <div className='price-and-btn'>
                <p className='room-desc-home'>{room.description}</p>
                <span className="glass-price">Price: ${room.price}/hour</span>
                <div className='glass-button'>
                  <Link to={`/rooms/${room.title}`} className='view-room-btn'>
                    {/* <button className="view-room-btn"> */}
                    View Room
                    {/* </button> */}
                  </Link>
                </div>

              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  )
}

export default RoomsShop
