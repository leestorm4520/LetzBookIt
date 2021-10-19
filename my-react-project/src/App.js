
import './App.css';
import travel from './travelNews.png';
import logo from './logo.jpeg';
import Login from './components/loginPage';
import Account from './components/CreateAccount';
import resort from './resort.jpg';
import flightSale from './SaleFlight.jpg';
import 'bootstrap/dist/css/bootstrap.min.css';
import { BrowserRouter as Router, Route, Switch, Link } from "react-router-dom";
import { Button, Navbar, Row, Col, Image, Container, Nav, NavDropdown, Form, FormControl } from 'react-bootstrap';
import { Carousel } from 'react-bootstrap';
import React, { useState } from "react";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import Mydash from './components/dashBoard';

import Bar from './components/navBar';
function App() {



  return (
    <div className="App">
      <Container>
        <Row>
          <Col xs={6} md={4}>
            <img className="logoImage" src={logo} alt="" />
          </Col>
        </Row>
      </Container>

      <Row>
        <Bar />
      </Row>

      <hr />
      <Carousel>
        <Carousel.Item>
          <img class="d-block w-50" src={travel} alt="" />
        </Carousel.Item>
        <Carousel.Item>
          <img class="d-block w-50" src={resort} alt="" />
        </Carousel.Item>
        <Carousel.Item>
          <img class="d-block w-50" src={flightSale} alt="" />
        </Carousel.Item>
      </Carousel>
    </div>
  );
}

export default App;
