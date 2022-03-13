import React from 'react'
import "./featured-appointments.scss"
import rooms from '../../data/rooms/rooms'
import { Link } from "react-router-dom"

function FeaturedRooms() {
  return (
    <div id={'featured-appointments'}>
      <div>
        <h2 className='generic-title'>Get your eyes checked</h2>
        <hr />
      </div>
      <div className='featured-rooms'>
        {rooms.map(room => (
          <div className="room-container-home" key={room.id}>
            <div className="room-photo-container">
              <img className="room-photo-home" src={room.image} alt={room.title} />
            </div>
            <div className='room-info-home'>
              <h2 className="room-title-home">{room.title}</h2>
              {/* <p className='room-desc-home'>{room.description}</p> */}
              {/* <h3 className="room-price-home">Price: ${room.price}/hour</h3> */}
              <div className='button-container'>
                <Link to={`/rooms/${room.title}`} className='view-room-button'>
                  View Room
                </Link>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  )
}

export default FeaturedRooms
