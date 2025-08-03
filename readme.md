# PHP E-Commerce Order Processing System  
**Demonstrates SOLID Principles & 5 Common Design Patterns in PHP**

This project is a **mini e-commerce order processing system** built to showcase:  
1. **SOLID Principles of OOP in PHP**  
2. **5 Popular Design Patterns** for real-life applications  

It’s perfect for learning **clean, maintainable, and scalable PHP architecture**.

---

## 🚀 Features

- **Order Placement** with dynamic payment selection  
- **Payment Processing** using multiple strategies (PayPal / Stripe)  
- **Observer-based Notifications** (Email, SMS) after successful order  
- **Singleton Database Connection** for optimized resource usage  
- **Dependency Injection** for testable & flexible services  

---

## 📦 Technologies & Concepts

- **Language**: PHP 7+  
- **OOP Concepts**: Class, Object, Inheritance, Interfaces, Encapsulation, Polymorphism  
- **SOLID Principles**:  
  - **S** – Single Responsibility  
  - **O** – Open/Closed  
  - **L** – Liskov Substitution  
  - **I** – Interface Segregation  
  - **D** – Dependency Inversion  

- **Design Patterns Implemented**:
  1. **Singleton** – Database connection  
  2. **Factory** – Payment method creation  
  3. **Strategy** – Switch payment processing dynamically  
  4. **Observer** – Email & SMS notifications  
  5. **Dependency Injection** – Inject payment gateway into Order Service  

---

## 🏗 Project Structure

| Principle / Pattern       | Where Used                         | Benefit                                                |
| ------------------------- | ---------------------------------- | ------------------------------------------------------ |
| **Single Responsibility** | `Database.php`, `EmailService.php` | Each class has one job                                 |
| **Open/Closed**           | `PaymentFactory.php`               | Add new payment methods without changing existing code |
| **Liskov Substitution**   | `PaymentMethod` interface          | All payment classes can replace each other             |
| **Interface Segregation** | `PaymentMethod`, `Observer`        | Only required methods are implemented                  |
| **Dependency Inversion**  | `OrderService`                     | Depends on interfaces, not concrete classes            |
| **Singleton**             | `Database.php`                     | Single DB connection reused                            |
| **Factory**               | `PaymentFactory.php`               | Creates payment method objects dynamically             |
| **Strategy**              | `PaymentMethod` implementations    | Switch payment algorithms easily                       |
| **Observer**              | `EmailService` & `SMSService`      | Auto-notify on order events                            |
| **Dependency Injection**  | `OrderService` constructor         | Flexible and testable services                         |
