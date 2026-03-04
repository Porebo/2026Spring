# Lecture Notes: Use Case Diagrams

**Date:** February 24, 2026  
**Time:** 2:54 PM – 3:47 PM  

## Narrative of Activities

In this session, Professor Daniel Berleant introduced **use case diagrams** and their role in software engineering. The lecture built on prior discussions of process modeling (data flow diagrams, BPMN) and shifted focus to how systems are described from the user's perspective. The class worked through examples—elevators, text editors, and restaurants—to develop intuition about use case granularity. The session concluded with AI-generated true/false and multiple-choice questions that the class answered together.

## Teaching Points & Methodology

### What Is a Use Case?

- A **use case** is a description of how a user interacts with a system — an example of how a system is used.
- It is **not** inherently a diagram. A use case is a **concept** that can be expressed as a diagram or as written text.
- A **use case diagram** is the visual representation of use cases using UML-style notation (stick figures for actors, ovals for use cases, a rectangle for the system boundary).

### Systems That Use Cases Can Describe

- Software applications, websites, business processes
- Physical systems like cars, elevators
- Entire businesses (e.g., an online store's checkout flow)
- Originally a **software engineering technique** (translated from the term "usage case")

### The Elevator Example

The class examined a use case diagram for an elevator with two ovals: "Press Outside Button" and "Press Floor Button."

**Key question:** Is this one use case or two?

- **Two use cases (fish level):** Each button press is a separate interaction with the system
- **One use case (sea level):** The user's goal is simply to get from one floor to another; pressing buttons are steps within that single goal

Both interpretations are valid — it depends on the chosen level of granularity.

### Sea Level vs. Fish Level (Alistair Cockburn's Framework)

**Cockburn** is widely regarded as the top authority on use cases.

| Level | Name | Meaning | Focus |
|-------|------|---------|-------|
| High | **Sea level** | Holistic, goal-oriented | What the user wants to accomplish |
| Low | **Fish level** | Granular, step-by-step | Individual interactions with the system |

- **Sea level** = the system boundary (the box); views the entire interaction as one purpose
- **Fish level** = the individual ovals inside the box; each step is its own use case
- **Granularity is a design decision** — neither level is inherently correct

**When to use each:**
- **Sea level** → More useful for communicating with users/stakeholders about what they want
- **Fish level** → More useful for designing the internal structure of a system

### The Restaurant Example

A more complex use case diagram with multiple actors (waiter, client, cashier, chef) and ~9 use cases (order food, serve food, cook food, eat food, order wine, serve wine, drink wine, pay for food, pay for wine).

- Even at sea level, this system still has **multiple use cases** (you can group related ones, but they don't all collapse into one)
- Example groupings: wine-related actions together, food-related actions together, payment actions together

### Use Case Diagrams Do NOT Show Sequence

- The restaurant diagram doesn't indicate that food must be ordered → cooked → served → eaten → paid for
- Top-to-bottom reading is not reliable for determining order
- **If you need sequence**, use a **written use case** (a textual description listing steps in order)
- A use case diagram is therefore **higher level and more abstract** — it intentionally omits sequence information

### What Use Case Diagrams Are Missing (Elevator Example)

The simple elevator diagram omits:
- A timeline / sequence of actions
- Door operations (opening, closing, walking through)
- Other actors (repair person, other passengers)
- Alternative paths (taking the stairs)
- Multiple floor buttons (the diagram is vague about building size)

A more detailed diagram would add these elements.

### Written Use Cases vs. Diagrams

| Aspect | Use Case Diagram | Written Use Case |
|--------|-----------------|-----------------|
| Sequence | Not shown | Explicitly listed |
| Detail level | High-level overview | Can be very detailed |
| Information | Less (removes sequence) | More (includes steps, conditions) |
| Best for | Bird's-eye view, brainstorming | Precise specifications |

## In-Class Practice: True/False Questions

1. **"A use case describes how a user interacts with a system to achieve a goal."**  
   → Debatable. True for sea-level use cases, but fish-level ones may not be goal-oriented. **Not strictly true in all cases.**

2. **"A use case diagram shows the exact sequence of steps performed."**  
   → **False.** Diagrams show actors, goals, and relationships — not step-by-step order.

3. **"Sea-level use cases are more granular and detailed than fish-level use cases."**  
   → **False.** Fish level is more granular. Sea level is goal-oriented.

4. **"A written use case typically includes a sequence of actions."**  
   → **True.** Writing them down allows you to capture sequence.

5. **"Choosing the granularity of a use case is a design decision."**  
   → **True.** It's a modeling choice made by the designer — merge for sea level, split for fish level.

## Key Authorities Mentioned

- **Alistair Cockburn** — top authority on use cases; sea level vs. fish level framework
- **Stephen Schach** — software engineering textbook author; advocates for single (goal-oriented) use cases

## Key Takeaways

1. A use case is a **concept**, not just a diagram
2. Granularity (sea vs. fish) is a **design choice** with no single correct answer
3. Use case diagrams are great for **brainstorming** and high-level understanding
4. For **sequence and detail**, use written use cases
5. Real systems require thinking about **missing elements** (alternative paths, other actors, edge cases)

## Next Session

Thursday: JavaScript
