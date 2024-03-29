import './App.css';
import React, {Component} from "react";
import Car from "./Car/Car";

class App extends Component {
    state = {
        cars: [
            {name: 'Ford', year: 2018},
            {name: 'Mazda', year: 2016},
            {name: 'Audi', year: 2010},
        ],
        pageTitle: 'React components',
    }

    changeTitleHandler = () => {
        console.log('React click')
    }
    render() {
    const cars = this.state.cars;
    const divStyle = {
        textAlign: 'center',
    };
    return (
        <div style={divStyle}>
            <h1>
                {this.state.pageTitle}
            </h1>

            <button onClick={this.changeTitleHandler}>
                Change title
            </button>
            <Car name={cars[0].name} year={cars[0].year}/>
            <Car name={cars[1].name} year={cars[1].year}/>
            <Car name={cars[2].name} year={cars[2].year}/>
        </div>
    );
}
}
export default App;
