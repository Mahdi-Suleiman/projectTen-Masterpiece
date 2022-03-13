import React from 'react'
import FeaturedGlasses from "../../components/featured-glasses/featured-glasses"
import FeaturedAppointments from '../../components/featured-rooms/FeaturedAppointments'
import HeroVideo from '../../components/hero-img/hero-video'
import Testimonial from './testimonial/testimonial'

function HomePage() {
    return (
        < div id='h5h'>
            <HeroVideo />
            <FeaturedGlasses />
            {/* <FeaturedAppointments /> */}
            <Testimonial />
        </ div>
    )
}

export default HomePage
