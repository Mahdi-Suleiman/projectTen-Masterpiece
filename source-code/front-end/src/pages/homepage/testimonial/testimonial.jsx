import React, { useEffect } from "react";
import './testimonial.scss'
const Testimonial = () => {
    useEffect(() => {
        let testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
            testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
            testimLeftArrow = document.getElementById("left-arrow"),
            testimRightArrow = document.getElementById("right-arrow"),
            testimSpeed = 4000,
            currentSlide = 0,
            currentActive = 0,
            testimTimer
            ;
        const playSlide = (slide) => {
            for (let i = 0; i < testimDots.length; i++) {
                testimContent[i].classList.remove("active");
                testimContent[i].classList.remove("inactive");
                testimDots[i].classList.remove("active");
            }

            if (slide < 0) {
                slide = currentSlide = testimContent.length - 1;
            }

            if (slide > testimContent.length - 1) {
                slide = currentSlide = 0;
            }

            if (currentActive !== currentSlide) {
                testimContent[currentActive].classList.add("inactive");
            }
            testimContent[slide].classList.add("active");
            testimDots[slide].classList.add("active");

            currentActive = currentSlide;

            clearTimeout(testimTimer);
            testimTimer = setTimeout(() => {
                playSlide(currentSlide += 1);
            }, testimSpeed)
        }

        testimLeftArrow.addEventListener("click", () => {
            playSlide(currentSlide -= 1);
        })

        testimRightArrow.addEventListener("click", () => {
            playSlide(currentSlide += 1);
        })

        playSlide(currentSlide);

        return (() => {
            testimLeftArrow.removeEventListener("click", () => {
                playSlide(currentSlide -= 1);
            })

            testimRightArrow.removeEventListener("click", () => {
                playSlide(currentSlide += 1);
            })
        })

    }, [])
    return (
        <div id="testimonials">
            <div>
                <h2 className="generic-title">Testimonials</h2>
                <hr />
                <section id="testim" className="testim">
                    <div sName="testim-cover">
                        <div className="wrap">

                            <span id="right-arrow" className="arrow right fa fa-chevron-right"></span>
                            <span id="left-arrow" className="arrow left fa fa-chevron-left "></span>
                            <ul id="testim-dots" className="dots">
                                <li className="dot active"></li>
                                <li className="dot"></li>
                                <li className="dot"></li>
                                <li className="dot"></li>
                                <li className="dot"></li>
                            </ul>
                            <div id="testim-content" className="cont">

                                <div className="active">
                                    <div className="img"><img src="https://www.w3schools.com/howto/img_avatar.png" alt="" /></div>
                                    <h2>John Doe</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                </div>

                                <div>
                                    <div className="img"><img src="https://www.w3schools.com/howto/img_avatar2.png" alt="" /></div>
                                    <h2>Jane Doe</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde neque voluptatibus aspernatur laudantium hic obcaecati natus fuga atque maxime voluptas eius culpa qui debitis quia officiis consectetur blanditiis illo at quibusdam, dolorum quisquam? Officia eius optio id! Minus, praesentium voluptas.</p>
                                </div>

                                <div>
                                    <div className="img"><img src="https://www.w3schools.com/howto/img_avatar.png" alt="" /></div>
                                    <h2>John Doe</h2>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos hic tempore dicta numquam. Temporibus possimus iure et mollitia voluptates quia architecto in labore molestias, qui sequi, voluptatibus unde molestiae odit.</p>
                                </div>

                                <div>
                                    <div className="img"><img src="https://www.w3schools.com/howto/img_avatar2.png" alt="" /></div>
                                    <h2>Jane Doe</h2>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi quaerat neque laudantium sunt earum sequi itaque tempore quasi nobis unde cumque, accusamus saepe magnam consectetur hic dolores nihil esse, laboriosam amet quae iure alias ad?</p>
                                </div>

                                <div>
                                    <div className="img"><img src="https://www.w3schools.com/howto/img_avatar.png" alt="" /></div>
                                    <h2>John Doe</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis unde a, reprehenderit magni facere sequi modi. Ab architecto et praesentium, neque id minus earum maiores!</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
            {/* <script src="https://use.fontawesome.com/1744f3f671.js"></script> */}
        </div>
    )
}

export default Testimonial