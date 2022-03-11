import React from 'react'
import Login from '../../components/login/login'


function LoginPage(props) {
    return (
        <div>
            <Login setLoggedUser={props.setLoggedUser} />
        </div>
    )
}

export default LoginPage
