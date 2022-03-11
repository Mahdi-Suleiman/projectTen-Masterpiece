import React, { useState } from 'react'
import "./featured-glasses.scss"
import glasses from '../../data/glasses/glasses'
import { Link } from "react-router-dom"

function FeaturedGlasses() {
  const [glasses, setGlasses] = useState([]);
  fetch('http://127.0.0.1:8000/api/products')
    .then(res => res.json())
    .then(data => setGlasses(data))
  // .then(() => console.log(glasses))
  // console.log(typeof (glasses))

  glasses.map(glass => console.log(glass))
  return (
    <div id={'featured-glasses'}>
      <div>
        <h2 className='generic-title'>Best sellers</h2>
        <hr />
      </div>
      <div className='glasses-container-home'>
        {glasses.filter((glass, index) => index < 3).map((glass) => (
          <div className="glass-wrapper" key={glass.id}>
            <h2 className="glass-title">{glass.name}</h2>
            <div className="glass-image-wrapper">
              <img className="glass-image" src={glass.image_url} alt={glass.name} />
            </div>
            {/* <h4 className="glass-price">Price: ${glass.price}</h4> */}
            <div className='glass-button'>
              <Link to={`/glasses/${glass.id}`}>
                View Glass
              </Link>
            </div>
          </div>
        ))}
      </div>
    </div>
  )
}

export default FeaturedGlasses
