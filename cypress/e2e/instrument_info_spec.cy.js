describe('Instrument Details Page', () => {
  beforeEach(() => {
    cy.visit('http://127.0.0.1:8000/catalogue/1/instruments/7249bd90-1df3-11ef-969a-bd41e4a26143');
  });

  it('should load the instrument details page', () => {
    cy.get('.title h3').should('contain.text', 'Stagg WS BT235 Bb Tuba with Case');
    cy.contains('h5', 'Description');
    cy.contains('h5', 'Instrument family');
    cy.contains('h5', 'Price');
    cy.contains('h5', 'In stock');
  });

  it('should display a valid image for the instrument', () => {
    cy.get('#families img').should('have.attr', 'src').should('not.be.empty');
    cy.get('#families img').should('be.visible');
  });

  it('should display correct instrument details', () => {
    cy.get('.typewriter h5').should('contain', 'Description');
    cy.get('.text-monospace').should('not.be.empty');
  });

  it('should navigate to the home page from the navigation menu', () => {
    cy.get('nav').contains('Home').click();
    cy.url().should('include', '/home');
    cy.contains('h1', 'Strings');
  });

  it('should navigate to the shopping cart page from the navigation menu', () => {
    cy.get('nav').contains('Shopping cart').click();
    cy.url().should('include', '/shopping_cart');
    cy.contains('h3', 'Shopping cart');
  });

  it('should navigate back to the instrument family catalogue page', () => {
    cy.get('.btn-text').contains('Go back').click();
    cy.url().should('include', '/catalogue/1'); 
    cy.contains('h3', 'Catalogue');
  });

  it('should add the instrument to the cart', () => {
    cy.get('form').within(() => {
      cy.get('input[type="submit"]').click();
    });
    cy.contains('.alert-success', 'Item was added to your cart!');
  });

  it('should display success and warning messages if present', () => {
    cy.get('body').then(($body) => {
      if ($body.find('div.alert-success').length > 0) {
        cy.get('div.alert-success').should('be.visible');
      }
      if ($body.find('div.alert-warning').length > 0) {
        cy.get('div.alert-warning').should('be.visible');
      }
    });
  });
});
