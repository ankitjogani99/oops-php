# PHP SOLID Payment Processing System

A simple **Payment Processing System** in PHP demonstrating the **SOLID principles** of object-oriented design.  
This mini-project is ideal for learning **clean code**, **maintainable architecture**, and **OOP best practices**.

---

## 🚀 Features

- **Single Responsibility Principle (SRP)**:  
  - `Order` handles order data.  
  - `EmailService` handles sending emails.  

- **Open/Closed Principle (OCP)**:  
  - Easily add new payment methods (PayPal, Stripe, FreePayment) without changing existing classes.  

- **Liskov Substitution Principle (LSP)**:  
  - All payment methods (`PayPalPayment`, `StripePayment`, `FreePayment`) are interchangeable via the `PaymentMethod` interface.  

- **Interface Segregation Principle (ISP)**:  
  - `Notifiable` interface ensures classes only implement what they need (Email notifications).  

- **Dependency Inversion Principle (DIP)**:  
  - `PaymentProcessor` depends on abstractions (`PaymentMethod`, `Notifiable`), not concrete classes.

---

