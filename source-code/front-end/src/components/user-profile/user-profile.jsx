import React, { useState, useRef } from "react";
import "./user-profile.scss";
import { useNavigate } from "react-router-dom";
import Swal from 'sweetalert2'

function Userprofile() {
  let loggedUser = JSON.parse(localStorage.getItem("loggedUser"));
  let navigate = useNavigate()
  let allUsers = JSON.parse(localStorage.getItem("users"));

  const [deleteItem, setDeleteItem] = useState(loggedUser.appointments);

  const [firstNameState, setFirstNameState] = useState(false);
  const [firstName, setFirstName] = useState(loggedUser.firstName);
  const firstNameInput = useRef();

  const [lastNameState, setLastNameState] = useState(false);
  const [lastName, setLastName] = useState(loggedUser.lastName);
  const lastNameInput = useRef();

  const [emailState, setEmailState] = useState(false);
  const [email, setEmail] = useState(loggedUser.email);
  const emailInput = useRef();

  const [passwordState, setPasswordState] = useState(false);
  const [password, setPassword] = useState(loggedUser.password);
  const passwordInput = useRef();

  const changeFirstName = async () => {
    await setFirstNameState(!firstNameState);
    changeFocus(firstNameInput);
  };

  const changeFocus = (ref) => {
    ref.current.focus();
  };

  const changeFirstNameValue = () => {
    loggedUser.firstName = firstNameInput.current.value;
    localStorage.setItem("loggedUser", JSON.stringify(loggedUser));
    let filteredUsers = allUsers.filter((data) => data.id !== loggedUser.id);
    filteredUsers.push(loggedUser);
    localStorage.setItem("users", JSON.stringify(filteredUsers));
    setFirstName(firstNameInput.current.value);
    setFirstNameState(!firstNameState);
  };

  const changeLastName = async () => {
    await setLastNameState(!lastNameState);
    changeFocus(lastNameInput);
  };

  const changeLastNameValue = () => {
    loggedUser.lastName = lastNameInput.current.value;
    localStorage.setItem("loggedUser", JSON.stringify(loggedUser));
    let filteredUsers = allUsers.filter((data) => data.id !== loggedUser.id);
    filteredUsers.push(loggedUser);
    localStorage.setItem("users", JSON.stringify(filteredUsers));
    setLastName(lastNameInput.current.value);
    setLastNameState(!lastNameState);
  };

  const changeEmail = async () => {
    await setEmailState(!emailState);
    changeFocus(emailInput);
  };

  const changeEmailValue = () => {
    let flag = false;
    loggedUser.email = emailInput.current.value;
    for (let i = 0; i < allUsers.length; i++) {
      if (loggedUser.email === allUsers[i].email) {
        flag = true;
        Swal.fire({
          title: "Email already exists",
          text: "Please enter a different email",
          icon: "error",
          confirmButtonText: "OK",
        });
      }
    }
    if (flag === false) {
      localStorage.setItem("loggedUser", JSON.stringify(loggedUser));

      let filteredUsers = allUsers.filter((data) => data.id !== loggedUser.id);
      filteredUsers.push(loggedUser);
      localStorage.setItem("users", JSON.stringify(filteredUsers));
      setEmail(emailInput.current.value);
      setEmailState(!emailState);
      Swal.fire({
        title: "Email changed successfully",
        text: "Please login again",
        icon: "success",
        confirmButtonText: "OK",
      });
    }
  };

  const changePassword = async () => {
    await setPasswordState(!passwordState);
    changeFocus(passwordInput);
  };

  const changePasswordValue = () => {
    loggedUser.password = passwordInput.current.value;
    localStorage.setItem("loggedUser", JSON.stringify(loggedUser));
    let filteredUsers = allUsers.filter((data) => data.id !== loggedUser.id);
    filteredUsers.push(loggedUser);
    localStorage.setItem("users", JSON.stringify(filteredUsers));
    setPassword(passwordInput.current.value);
    setPasswordState(!passwordState);
  };


  const handleLogout = () => {
    Swal.fire({
      title: "Are you sure?",
      text: "You will be logged out",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.value) {
        localStorage.removeItem("loggedUser");
        Swal.fire({
          title: "Logged out successfully",
          text: "",
          icon: "success",
        });
        navigate('/register')
      }
    });
  }



  const handleDeletion = (index, localStorageServiceKey) => {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.value) {
        Swal.fire("Deleted!", "Your file has been deleted.", "success");
        let filteredLoggedUser = loggedUser.appointments.filter(
          (data) => data.id !== index
        );
        loggedUser.appointments = filteredLoggedUser;
        localStorage.setItem("loggedUser", JSON.stringify(loggedUser));
        console.log(filteredLoggedUser);
        let filteredAllUsers = allUsers.filter(
          (element) => element.id !== loggedUser.id
        );
        allUsers = filteredAllUsers;
        allUsers.push(loggedUser);
        localStorage.setItem("users", JSON.stringify(allUsers));

        let localStorageKey = JSON.parse(
          localStorage.getItem(`${localStorageServiceKey} appointments`)
        );
        let filteredLocalStorageKey = localStorageKey.filter(
          (data) => data.id !== index
        );
        localStorage.setItem(
          `${localStorageServiceKey} appointments`,
          JSON.stringify(filteredLocalStorageKey)
        );

        setDeleteItem(allUsers);
      }
    });

  };

  return (
    <main className="main-cont2" id="form">
      <div className="container2">
        <div className="header2">
          <h2>Profile </h2>
          {/* <button className="logout-btn" onClick={handleLogout}>Logout</button> */}
        </div>
        <div className="double-container">

          <div className="profile-container-div">
            {/* <h2 >Reservations</h2>
            <table className="user-reservations" >
              <thead>
                <tr>
                  <th>Technician</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Total Price</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
                {loggedUser.appointments
                  ? loggedUser.appointments.map((booking) => (
                    <tr key={booking.id}>
                      <td>{booking.service}</td>
                      <td>{booking.date}</td>
                      <td>{booking.startTime}</td>
                      <td>{booking.finishTime}</td>
                      <td>{booking.totalPrice}</td>
                      <td>
                        <i
                          class="fas fa-trash-alt"
                          onClick={() =>
                            handleDeletion(booking.id, booking.service)
                          }
                        ></i>
                      </td>
                    </tr>
                  ))
                  : null}
              </tbody>
            </table> */}
          </div>
          <div className="profile-container-div">
            <h2>Cart Items</h2>
            <div className="cart-profile-container">
              {[loggedUser.cartItems.map(item => <div className="cart-item-profile" key={item.id}>
                <img src={item.image} />
                <p>{item.title}</p>
                <p>{item.quantity} × {item.price}</p>
              </div>)]}</div>
          </div>
        </div>
      </div>
    </main>
  );
}

export default Userprofile;