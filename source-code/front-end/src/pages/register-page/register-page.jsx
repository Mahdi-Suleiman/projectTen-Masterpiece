import React from 'react'
import Register from '../../components/register/register'

function RegisterPage(props) {
    return (
        <div>
            <Register setLoggedUser={props.setLoggedUser} />
        </div>
    )
}

export default RegisterPage
