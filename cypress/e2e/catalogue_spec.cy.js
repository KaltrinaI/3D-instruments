describe('Catalogue Page', () => {
  beforeEach(() => {
    cy.visit('http://localhost:8000/catalogue'); // Adjust the URL to match your application's base URL
  });

  it('should load the catalogue page', () => {
    cy.get('.title h3').should('contain', 'Catalogue');
    cy.contains('Musical instruments are grouped into families based on how they make sounds.');
  });

  it('should display the correct navigation links', () => {
    cy.get('nav').within(() => {
      cy.contains('Home').should('have.attr', 'href', '/home');
      cy.contains('Catalogue').should('have.attr', 'href', '/catalogue');
      cy.contains('Shopping cart').should('have.attr', 'href', '/shopping_cart');
    });
  });

  it('Should display the instrument family buttons and highlight the active one', () => {
    const families = ['Brass', 'Percussion', 'String', 'Woodwind'];
    cy.get('.btn-group .btn').each(($el, index) => {
        cy.wrap($el).should('contain', families[index]);
        
        // Use class check for active and non-active buttons
        if ($el.hasClass('border-active')) {
            cy.wrap($el).should('have.class', 'border-active').and('not.have.class', 'border-dark');
        } else {
            cy.wrap($el).should('have.class', 'border-dark').and('not.have.class', 'border-active');
        }
    });
});

it('Should display a message if there are no instruments', () => {
  cy.get('body').then(($body) => {
      if ($body.find('.typewriter h5').length) {
          cy.get('.typewriter h5').should('contain', 'There are currently no instruments in this instrument family.');
      }
  });
});

it('Should display the instrument names and prices correctly for all listed instruments', () => {
  cy.get('.card-group').each(($el) => {
      cy.wrap($el).within(() => {
          cy.get('.card-title').should('not.be.empty'); 
          cy.get('.card-text').should('not.be.empty');
      });
  });
});

it('Should navigate to the instrument details page when "See more" is clicked', () => {
  cy.get('body').then(($body) => {
      if ($body.find('.card-group .btn a').length > 0) {
          cy.get('.card-group .btn a').first().click();
          cy.url().should('include', '/catalogue/').then((url) => {
              cy.log('Navigated URL:', url);
          });
          cy.get('h3').should('not.be.empty'); // Check that the h3 contains the instrument name
      } else {
          cy.log('No instruments found to navigate to details page');
      }
  });
});


it('should load images correctly for each instrument', () => {
  cy.get('.card-group img').each(($img) => {
      cy.wrap($img).should('have.attr', 'src').and('not.be.empty');
  });
});

it('Should display pagination if there are more instruments', () => {
  cy.get('body').then(($body) => {
      if ($body.find('.pagination').length) {
          cy.get('.pagination').should('be.visible');
      }
  });
});

it('should correctly navigate to the home page from the navigation menu', () => {
  cy.get('nav').contains('Home').click();
  cy.url().should('include', '/home');
  cy.contains('h1', 'Strings');
});

it('should correctly navigate to the shopping cart page from the navigation menu', () => {
  cy.get('nav').contains('Shopping cart').click();
  cy.url().should('include', '/shopping_cart');
  cy.contains('Shopping cart');
});


it('should not display any JavaScript errors in the console', () => {
  cy.on('window:before:load', (win) => {
      cy.spy(win.console, 'error');
  });
  cy.visit('http://localhost:8000/catalogue');
  cy.window().then((win) => {
      expect(win.console.error).to.have.callCount(0);
  });
});

});
