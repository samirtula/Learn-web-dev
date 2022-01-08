const isFetching: boolean = true;
const isLoading: boolean = false;


const int: number = 42;
const float: number = 4.2;
const num: number = 3e10;


const message: string = 'Hello Typescript';

const numberArray: number[] = [1, 2, 3];
const numberArray1: Array<number> = [1, 2, 3];

const words: string[] = ['Hello', 'Typescript'];

//Tuple
const contact: [string, number] = ['Samir', 1234567];

//Any
let variable: any = 42;

variable = 'New String';

//functions

function sayMyName(name: string): void
{
    console.log(name)    
}

sayMyName('Heisenberg');

//Never

function throwError(message: string) :never {
    throw new Error(message);
};

function infinite(): never {
    while (true) {
    }
}

//Type in real this is aliases
type Login = string;

const login: Login = 'Ed';


type ID = string | number;
const id1: ID = 1;
const id2: ID = '23';
//const id3:ID = true;


type SomeType = string | null | undefined;


