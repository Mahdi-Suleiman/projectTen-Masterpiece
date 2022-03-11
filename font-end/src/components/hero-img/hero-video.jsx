import React from 'react'
import './hero-video.scss'
import video from '../../assets/video2.mp4'
import rayban1 from '../../assets/rayban1.png'

function HeroImage() {
    return (
        <div class="home-container">
            <video src={video} autoPlay muted loop className='heroVideo'></video>
            <div className='videoOverlay'>
                <div className="secondOverlay">
                    <div className="home-left">
                        <h1>Get ready for the summer</h1>
                        <h2>Cover your eyes & all of your needs with our collection</h2>
                        <button onClick={() => window.location.replace("/#featured-glasses")}>GET STARTED <i aria-hidden="true" class="fas fa-angle-right"></i></button>

                    </div>
                    <div className="home-right">
                        <img src={rayban1} alt="rayban sunglasses" />
                    </div>
                </div>
            </div>


        </div>
    )
}

export default HeroImage
