import React, { useState } from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import { BrowserRouter as Router, Route, Switch, Link } from "react-router-dom";
import { Button, Navbar, Row, Col, Image, Container, Nav, NavDropdown, Form, FormControl } from 'react-bootstrap';
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";


function DashBoard() {

    const [DateIn, setDateIn] = useState(null)
    
    const [DateOut, setDateOut] = useState(null)



    return (
        <div>
            <Container className="Inputs">
                <Row md={5}>
                    <Col>
                        <input placeholder="Location" type="location" />
                    </Col>
                    <Col>
                        <DatePicker placeholderText="From... " selected={DateIn} onChange={(date) => setDateIn(date)} dateFormat='dd/MM/yyyy' isClearable />
                    </Col>
                    <Col>
                        <DatePicker placeholderText="... End " selected={DateOut} onChange={(date) => setDateOut(date)} dateFormat='dd/MM/yyyy' isClearable />
                    </Col>
                    <Col>
                        <input placeholder="Party Size" type="PartySize" />
                    </Col>
                    <Col>
                        <button class="searchButton" class="btn btn-primary btn-lg">Search
                        </button>
                    </Col>

                </Row>

            </Container>

        </div>
    )
}

export default DashBoard
