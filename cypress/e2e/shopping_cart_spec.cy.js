describe('Shopping Cart Page', () => {
  beforeEach(() => {
    cy.visit('http://localhost:8000/shopping_cart');
  });

  it('should load the shopping cart page', () => {
    cy.contains('h3', 'Shopping cart');
  });

  it('should display success and warning messages if present', () => {
    cy.get('body').then(($body) => {
      // Check if the success message exists and is visible
      if ($body.find('div.alert-success').length > 0) {
        cy.get('div.alert-success').should('be.visible');
      }
      // Check if the warning message exists and is visible
      if ($body.find('div.alert-warning').length > 0) {
        cy.get('div.alert-warning').should('be.visible');
      }
    });
  });
  

  it('should display the table when there are items in the cart', () => {
    cy.get('body').then(($body) => {
      if ($body.find('div.table-responsive').length > 0) {
        cy.get('div.table-responsive table').should('be.visible');
      } else {
        cy.get('div.typewriter').should('be.visible').and('contain.text', 'There are currently no instruments in your shopping cart.');
      }
    });
  });

  it('should display correct table headers', () => {
    cy.get('body').then(($body) => {
      if ($body.find('div.table-responsive').length > 0) {
        cy.get('div.table-responsive table thead th').eq(0).should('contain', 'Product');
        cy.get('div.table-responsive table thead th').eq(1).should('contain', 'Price');
        cy.get('div.table-responsive table thead th').eq(3).should('contain', 'Quantity');
      }
    });
  });

  it('should display correct product details in the table', () => {
    cy.get('body').then(($body) => {
      if ($body.find('div.table-responsive').length > 0) {
        cy.get('div.table-responsive table tbody tr').each(($row) => {
          cy.wrap($row).within(() => {
            cy.get('td').eq(0).should('not.be.empty'); // Product
            cy.get('td').eq(1).should('contain.text', '$'); // Price
            cy.get('td').eq(3).should('not.be.empty'); // Quantity
          });
        });
        cy.get('div.table-responsive table tfoot td').eq(1).should('contain', 'Total:');
        cy.get('div.table-responsive table tfoot td').eq(2).should('contain.text', '$');
      }
    });
  });

  it('should navigate to the checkout page when "Checkout" is clicked', () => {
    cy.get('body').then(($body) => {
      if ($body.find('div.table-responsive').length > 0) {
        cy.get('a').contains('Checkout').click();
        cy.url().should('include', '/shopping_cart/checkout');
      }
    });
  });

  it('should clear the cart when "Clear" is clicked', () => {
    cy.get('body').then(($body) => {
      if ($body.find('div.table-responsive').length > 0) {
        cy.get('a').contains('Clear').click();
        cy.contains('There are currently no instruments in your shopping cart.');
      }
    });
  });

  it('should increase the quantity of an item when "+" is clicked', () => {
    cy.get('body').then(($body) => {
      if ($body.find('div.table-responsive').length > 0) {
        cy.get('table tbody tr').first().within(() => {
          cy.get('td').eq(3).then(($qty) => {
            const initialQty = parseInt($qty.text());
            cy.get('a').contains('+').click();
            cy.get('td').eq(3).should(($newQty) => {
              expect(parseInt($newQty.text())).to.equal(initialQty + 1);
            });
          });
        });
      }
    });
  });

  it('should decrease the quantity of an item when "-" is clicked', () => {
    cy.get('body').then(($body) => {
      if ($body.find('div.table-responsive').length > 0) {
        cy.get('table tbody tr').first().within(() => {
          cy.get('td').eq(3).then(($qty) => {
            const initialQty = parseInt($qty.text());
            cy.get('a').contains('-').click();
            cy.get('td').eq(3).should(($newQty) => {
              if (initialQty > 1) {
                expect(parseInt($newQty.text())).to.equal(initialQty - 1);
              } else {
                expect(parseInt($newQty.text())).to.equal(1);
              }
            });
          });
        });
      }
    });
  });

  it('should remove an item from the cart when "Remove" is clicked', () => {
    cy.get('body').then(($body) => {
      if ($body.find('div.table-responsive').length > 0) {
        cy.get('table tbody tr').first().within(() => {
          cy.get('a').contains('Remove').click();
        });
        cy.contains('There are currently no instruments in your shopping cart.');
      }
    });
  });

  it('should not display any JavaScript errors in the console', () => {
    cy.on('window:before:load', (win) => {
      cy.spy(win.console, 'error');
    });
    cy.visit('http://localhost:8000/shopping_cart');
    cy.window().then((win) => {
      expect(win.console.error).to.have.callCount(0);
    });
  });
});
