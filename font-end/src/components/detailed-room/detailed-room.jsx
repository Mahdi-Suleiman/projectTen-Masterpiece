import React, { useState } from 'react'
import "./detailed-room.scss"
import { useParams, useNavigate } from "react-router-dom";
import ReservationForm from '../reservation-form/reservation-form';

function DetailedRoom({ rooms }) {
  const { title } = useParams();
  const [showForm, setShowForm] = useState(false);
  const navigate = useNavigate();

  const checkForUser = () => {
    const user = JSON.parse(localStorage.getItem("loggedUser"))
    if (user) {
      setShowForm(true);
    } else {
      navigate("/login")
      setShowForm(false)
    }
  }
  const cancelForm = () => {
    setShowForm(false);
  };

  return (
    <div>
      {rooms
        .filter((room) => room.title === title)
        .map((room) => (
          <div>
            <div className='detailed-glass-container room' key={room.id}>
              <div className="glass-photo-container-detailed">
                <img className="glass-photo-detailed" src={room.image} alt={room.title} />
              </div>
              <div className='price-and-btn-detailed'>
                <h2 className="glass-title-detailed">{room.title}</h2>
                <p className='glass-desc-detailed'>{room.description}</p>
                <span className="glass-price-detailed">Price: ${room.price}/hour</span>
                {/* {!showForm ? (
                  <button className="buy-glass-btn" onClick={checkForUser}>
                    Book Now
                  </button>
                ) : (
                  <button className="buy-glass-btn" onClick={cancelForm}>
                    Cancel
                  </button>
                )} */}
              </div>
            </div>
            {/* {showForm ? <ReservationForm service={room} /> : ""} */}
            <ReservationForm service={room} />
          </div>
        ))}
    </div>
  )
}

export default DetailedRoom
