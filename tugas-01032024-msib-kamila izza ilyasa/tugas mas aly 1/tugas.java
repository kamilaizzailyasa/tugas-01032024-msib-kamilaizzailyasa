// Encapsulation: Wrapping data and methods into a single unit (class)

class Animal {
    private String name;  // private attribute

    public Animal(String name) {
        this.name = name;
    }

    public String getName() {
        return name;
    }

    public void makeSound() {
        // to be overridden in subclasses
    }
}

// Inheritance: Creating a new class based on an existing class (base class)

class Dog extends Animal {
    public Dog(String name) {
        super(name);
    }

    @Override
    public void makeSound() {
        System.out.println("Woof!");
    }
}

class Cat extends Animal {
    public Cat(String name) {
        super(name);
    }

    @Override
    public void makeSound() {
        System.out.println("Meow!");
    }
}

// Polymorphism: Objects of different classes can be treated as objects of a common base class

public class Main {
    public static void animalSounds(Animal animal) {
        System.out.println(animal.getName() + " says:");
        animal.makeSound();
    }

    public static void main(String[] args) {
        // Using the classes and demonstrating polymorphism

        Dog dog = new Dog("Buddy");
        Cat cat = new Cat("Whiskers");

        animalSounds(dog);  // Polymorphism: dog is treated as an Animal
        animalSounds(cat);  // Polymorphism: cat is treated as an Animal
    }
}