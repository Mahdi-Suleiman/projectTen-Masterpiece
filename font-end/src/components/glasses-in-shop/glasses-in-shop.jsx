import React, { useEffect, useState } from 'react'
import "./glasses-in-shop.scss"
// import glasses from '../../data/glasses/glasses'
import { Link } from "react-router-dom"
import axios from 'axios'

function GlassesShop() {
  const [glasses, setGlasses] = useState([]);

  useEffect(() => {
    fetchData();
  }, [])

  const fetchData = async () => {
    const res = await axios.get('http://127.0.0.1:8000/api/products')
    const data = res.data
    console.log(res.data)
    setGlasses(data)
  }

  return (
    <div>
      <div>
        <h2 className='generic-title'>Our Shop</h2>
        <hr />
      </div>
      <div className='glasses-container-home'>
        {glasses.map((glass) => (
          <div className="glass-wrapper" key={glass.id}>
            <h2 className="glass-title">
              {glass.name}
            </h2>
            <div className="glass-image-wrapper">
              <img className="glass-image" src={glass.image_url} alt={glass.name} />
            </div>

            <div className='glass-button'>
              {/* <Link to={`/glasses/${glass.name}`}> */}
              <Link to={`/glasses/${glass.id}`}>
                View Glass
              </Link>
            </div>
          </div>))
        }

      </div>
    </div>)
}

export default GlassesShop