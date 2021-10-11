import React, { Component } from 'react'
import 'bootstrap/dist/css/bootstrap.min.css';
import { BrowserRouter as Router, Route, Switch, Link } from "react-router-dom";
import Login from './loginPage';
import Account from './CreateAccount';
import Mydash from './dashBoard';
import { Button, Navbar, Row, Col, Image, Container, Nav, NavDropdown, Form, FormControl } from 'react-bootstrap';
import dashBoard from './dashBoard';
export default class navBar extends Component {
  render() {
    return (
      <Router>
      <div>
       
        <Navbar bg="dark" variant = {"dark"} expand="lg">
          <Container>
            <Navbar.Brand href="#home">Menu</Navbar.Brand>
            <Navbar.Toggle aria-controls="basic-navbar-nav" />
            <Navbar.Collapse id="basic-navbar-nav">
              <Nav className=" Menu" >
                <Nav.Link as = {Link} to = {"/Login"}>Login</Nav.Link>
                <Nav.Link as = {Link} to = {"/Account"} > Account</Nav.Link>
                <Nav.Link as = {Link} to = {"/"} > Find Hotel</Nav.Link>        
              </Nav>
            </Navbar.Collapse>
          </Container>
        </Navbar>
      <div>
      <Switch>
          <Route path="/Login">
            <Login />
          </Route>
          <Route path="/Account">
            <Account />
          </Route>
          <Route path="/">
            <Mydash />
          </Route>
        </Switch>
      </div>
      </div>
      </Router>
    )
  }
}


