import React from "react";

/*function car () {
    return (
        <div>This is car component</div>
    );
}*/
/*const car = () => {
    return (
        <div>This is car component</div>
    );
}*/
/*const car = () => (
    <div>This is car component
        <strong>Nissan</strong>
    </div>
)*/

/*
export default car;*/

/*
export default () => (
    <div>
        <p>This is car component</p>
        <strong> Nissan {Math.round(Math.random() * 100)}</strong>
    </div>
)*/

export default (props) => (
    <div>
        <h3>Car name: {props.name}</h3>
        <strong> Year: {props.year}</strong>
        {props.children}
    </div>
)