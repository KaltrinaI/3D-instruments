describe('Checkout Page', () => {
  beforeEach(() => {
      cy.visit('http://localhost:8000/shopping_cart/checkout');
  });

  it('should load the checkout page', () => {
      cy.contains('h3', 'Checkout');
  });

  it('should navigate to the home page from the navigation menu', () => {
      cy.get('nav').contains('Home').click();
      cy.url().should('include', '/home');
      cy.contains('h1', 'Strings');
  });

  it('should navigate to the catalogue page from the navigation menu', () => {
      cy.get('nav').contains('Catalogue').click();
      cy.url().should('include', '/catalogue');
      cy.contains('Catalogue');
  });

  it('should navigate to the shopping cart page from the navigation menu', () => {
      cy.get('nav').contains('Shopping cart').click();
      cy.url().should('include', '/shopping_cart');
      cy.contains('Shopping cart');
  });

  it('should display form validation errors if required fields are empty', () => {
      cy.get('form').submit();
      cy.get('.alert-danger').should('be.visible');
      cy.get('.alert-danger li').should('have.length.greaterThan', 0);
  });

  it('should submit the form successfully with valid data', () => {
      cy.get('input[name="email"]').type('test@example.com');
      cy.get('input[name="full_name"]').type('John Doe');
      cy.get('input[name="city"]').type('New York');
      cy.get('input[name="province"]').type('NY');
      cy.get('input[name="postal_code"]').type('10001');
      cy.get('input[name="phone"]').type('12345678');
      cy.get('input[name="name_on_card"]').type('John Doe');
      cy.get('input[name="card_number"]').type('4111111111111111');
      cy.get('input[name="expiration_date"]').type('2024-12');
      cy.get('input[name="cvc"]').type('123');
      cy.get('form').submit();
      cy.get('.alert-success').should('be.visible');
      cy.get('.alert-success').should('contain', 'Payment successful!');
  });

  it('should display correct product details in the table if data is present', () => {
    // Check if the table is present
    cy.get('body').then(($body) => {
      if ($body.find('div.table-responsive').length > 0) {
        // Table is present
        cy.get('div.table-responsive table').should('be.visible');

        // Check table headers
        cy.get('div.table-responsive table thead th').eq(0).should('contain', 'Product');
        cy.get('div.table-responsive table thead th').eq(1).should('contain', 'Quantity');
        cy.get('div.table-responsive table thead th').eq(2).should('contain', 'Price');

        // Check table rows
        cy.get('div.table-responsive table tbody tr').each(($row) => {
          cy.wrap($row).within(() => {
            cy.get('td').eq(0).should('not.be.empty'); // Product
            cy.get('td').eq(2).should('contain.text', '$'); // Price
            cy.get('td').eq(1).should('not.be.empty'); // Quantity
          });
        });

        // Check table footer
        cy.get('div.table-responsive table tfoot td').eq(1).should('contain', 'Total:');
        cy.get('div.table-responsive table tfoot td').eq(2).should('contain.text', '$');
      }
    });
  });

  it('should display success message if the form is submitted successfully', () => {
      // Fill the form with valid data and submit
      cy.get('input[name="email"]').type('test@example.com');
      cy.get('input[name="full_name"]').type('John Doe');
      cy.get('input[name="city"]').type('New York');
      cy.get('input[name="province"]').type('NY');
      cy.get('input[name="postal_code"]').type('10001');
      cy.get('input[name="phone"]').type('12345678');
      cy.get('input[name="name_on_card"]').type('John Doe');
      cy.get('input[name="card_number"]').type('4111111111111111');
      cy.get('input[name="expiration_date"]').type('2024-12');
      cy.get('input[name="cvc"]').type('123');
      cy.get('form').submit();

      // Check for success message
      cy.get('.alert-success').should('be.visible');
      cy.get('.alert-success').should('contain', 'Payment successful!');
  });

  it('should display error messages if the form submission fails', () => {
      // Simulate form submission with invalid data
      cy.get('input[name="email"]').type('invalid-email');
      cy.get('input[name="full_name"]').type('John Doe');
      cy.get('input[name="city"]').type('New York');
      cy.get('input[name="province"]').type('NY');
      cy.get('input[name="postal_code"]').type('invalid-postal-code');
      cy.get('input[name="phone"]').type('invalid-phone');
      cy.get('input[name="name_on_card"]').type('John Doe');
      cy.get('input[name="card_number"]').type('invalid-card-number');
      cy.get('input[name="expiration_date"]').type('2024-12');
      cy.get('input[name="cvc"]').type('invalid-cvc');
      cy.get('form').submit();

      // Check for error message
      cy.get('.alert-danger').should('be.visible');
      cy.get('.alert-danger li').should('have.length.greaterThan', 0);
  });


  it('should not display any JavaScript errors in the console', () => {
      cy.on('window:before:load', (win) => {
          cy.spy(win.console, 'error');
      });
      cy.visit('http://localhost:8000/shopping_cart/checkout');
      cy.window().then((win) => {
          expect(win.console.error).to.have.callCount(0);
      });
  });
});
