import React from 'react'


import 'bootstrap/dist/css/bootstrap.min.css';
import { Button, Form } from 'react-bootstrap';
const CreateAccount = () => {
    return (
        <div>
            <h5 className="createAccount">Create Account</h5>
            <div className="Account">
                <form>
                     <Form.Group className="mb-3" controlId="formBasicFirstName">
                        <Form.Label>First Name</Form.Label>
                        <Form.Control type="name" placeholder="Enter First Name" />
                    </Form.Group>

                    <Form.Group className="mb-3" controlId="formBasicLastName">
                        <Form.Label>Last Name</Form.Label>
                        <Form.Control type="name" placeholder="Enter Last Name" />
                    </Form.Group>
  
                    <Form.Group className="mb-3" controlId="formBasicPassword">
                        <Form.Label>Password</Form.Label>
                         <Form.Control type="password" placeholder="Password" />
                    </Form.Group>
                    <Form.Group className="mb-3" controlId="formBasicConfirmPassword">
                           <Form.Label>Confirm Password</Form.Label>
                          <Form.Control type="password" placeholder="Confirm password" />
                        </Form.Group>
                
                    <div className="form-group">
                        <button type="submit" className="btn btn-primary mr-1">Register</button>
                        <button type="button">Reset</button>
                    </div>
                </form>


            </div>

        </div>
    )
}

export default CreateAccount
