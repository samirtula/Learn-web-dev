interface Person {
    name: string;
    age: number;
}

type PersonKeys = keyof Person;

let key: PersonKeys = 'name';

key = 'age';
//key = 'job';


type User = {
    _id: number;
    name: string;
    email: string;
    createdAt: Date;
}

type UseKeysNoMeta = Exclude<keyof User, '_id' | 'createdAt'>;
type UserKeysNoMeta2 = Pick<User, 'name' | 'email'>;

let u1: UseKeysNoMeta = 'name';

