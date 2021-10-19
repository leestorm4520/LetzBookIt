
import React from 'react'
import { BrowserRouter as Router, Route, Switch, Link } from "react-router-dom";
import Account from "./CreateAccount";


import 'bootstrap/dist/css/bootstrap.min.css';
import { Button, Form } from 'react-bootstrap';


const loginPage = () => {
    return (
        <div>
            <Router>

                <Form>
                    <Form.Group className="mb-3" controlId="formBasicEmail">
                        <Form.Label>Email address</Form.Label>
                        <Form.Control type="email" placeholder="Enter email" />
                    </Form.Group>

                    <Form.Group className="mb-3" controlId="formBasicPassword">
                        <Form.Label>Password</Form.Label>
                        <Form.Control type="password" placeholder="Password" />
                    </Form.Group>
                    
                    <Button variant="primary" type="submit">
                        Submit
                    </Button>

                    <p> or </p>
                    <Link to="/Account" exact>Create Account</Link>
                    <Switch>
                        <Route path="/Account" component={Account}>
                            <Account />
                        </Route>
                    </Switch>
                </Form>
            </Router>
        </div>
    )
}

export default loginPage


